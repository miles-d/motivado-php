<?php

namespace App\Console\Commands;

use Crypt;
use Mail;
use Illuminate\Console\Command;
use App\User;
use App\Task;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		// Only notify users that do want it
		$users = User::where('notify', 1)->get();

		// For each user, check if he has tasks for today
		foreach ($users as $user) {
			// get proper tasks
			$tasks = Task::where('user_id', $user->id)
				->where('completed', 0)
				->where('due_date', date("Y-m-d"))
				->get(['description', 'motivation']);
			$tasksForToday = [];

			// Decrypt task description and motivation
			foreach ($tasks as $task) {
				$description = Crypt::decrypt($task['description']);
				$motivation = Crypt::decrypt($task['motivation']);

				$task = compact('description', 'motivation');
				$tasksForToday[] = $task;
			}

			// If there are reminders for this user, send him an email
			if (!empty($tasksForToday)) {
				Mail::send('email.daily', compact('user', 'tasksForToday'), function ($m) use ($user) {
					$m->to($user->email, $user->name)->subject('Motivado: Reminder!');
				});
			} else {
				$this->info('No mail notification sent today.');
			}
		}
    }
}
