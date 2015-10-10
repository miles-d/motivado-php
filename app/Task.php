<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypt;

class Task extends Model
{
	protected $fillable = [
        'user_id',
        'description',
        'motivation',
        'due_date',
        'completed',
	];

    /**
     * Decrypt tasks' content
     */
    private static function decrypt($tasks)
    {
        foreach($tasks as $t) {
            $t['description'] = Crypt::decrypt($t['description']);
            $t['motivation'] = Crypt::decrypt($t['motivation']);
        }
    }

    /**
     * Get user's tasks that are not done
     */
    public static function getTasks($id)
    {
        $tasks = self::where('user_id', $id)
            ->where('completed', '0')
            ->orderBy('due_date', 'asc')
            ->get();

        self::decrypt($tasks);

        return $tasks;
    }

    /**
     * Get user's done tasks
     */
    public static function getDoneTasks($user_id)
    {
		$doneTasks = self::where('user_id', $user_id)
			->where('completed', '=', '1')
			->orderBy('due_date', 'desc')
			->get();

        self::decrypt($doneTasks);

        return $doneTasks;
    }

    /**
     * Delete tasks that are already done
     */
    public static function destroyDone($user_id)
    {
        self::where('user_id', $user_id)->where('completed', '1')->delete();
    }

    /**
     * Check if a task is pending
     *
     * @return bool
     */
    public function isPending()
    {
        $today = new \DateTime;
        if ($this->completed == '0'
            && $this->due_date !== ''
            && $this->due_date <= $today->format('Y-m-d')) {
                return true;
            }
        else {
            return false;
        }
    }

    /**
     * Check if task is completed
     *
     * @return bool
     */
    public function isDone()
    {
        return (bool) $this->completed;
    }
}

