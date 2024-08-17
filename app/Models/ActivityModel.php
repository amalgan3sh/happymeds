<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;
use DateInterval;

class ActivityModel extends Model
{
    protected $table = 'recent_activity';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'type', 
        'amount', 
        'status', 
        'timestamp'
    ];

    public function yesterdaysActivityByUserId($user_id)
    {
        // Get the current date and time
        $now = new DateTime();
        
        // Set the time to midnight to get the start of today
        $todayStart = $now->setTime(0, 0, 0);
        
        // Subtract one day to get the start of yesterday
        $yesterdayStart = $todayStart->sub(new DateInterval('P1D'));
        
        // Reset the time to midnight at the start of yesterday
        $yesterdayStart->setTime(0, 0, 0);
        
        // Get the end of yesterday
        $endOfYesterday = (clone $yesterdayStart)->add(new DateInterval('P1D'));

        // Convert the DateTime objects to strings for the query
        $yesterdayStartStr = $yesterdayStart->format('Y-m-d H:i:s');
        $endOfYesterdayStr = $endOfYesterday->format('Y-m-d H:i:s');

        return $this->select('type, amount, status, TIME(timestamp) as time')
                    ->where('user_id', $user_id)
                    ->where('timestamp >=', $yesterdayStartStr)
                    ->where('timestamp <', $endOfYesterdayStr)
                    ->findAll();
    }

    public function getActivityByUserId($user_id)
    {
        // Get the current date and time
        $now = new DateTime();
        
        // Set the time to midnight to get the start of today
        $todayStart = $now->setTime(0, 0, 0);
        
        // Get the end of today by adding one day to the start of today
        $endOfToday = (clone $todayStart)->add(new DateInterval('P1D'));

        // Convert the DateTime objects to strings for the query
        $todayStartStr = $todayStart->format('Y-m-d H:i:s');
        $endOfTodayStr = $endOfToday->format('Y-m-d H:i:s');

        return $this->select('type, amount, status, TIME(timestamp) as time')
                    ->where('user_id', $user_id)
                    ->where('timestamp >=', $todayStartStr)
                    ->where('timestamp <', $endOfTodayStr)
                    ->findAll();
    }
}
