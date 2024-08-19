<?php

Schedule::command('notifications:send')->hourly(); // Send Pending Notifications, adjust the frequency as needed
Schedule::command('app:maintenance')->daily(); // Run System Maintenance tasks, adjust the frequency as needed
