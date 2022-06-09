<?php

namespace App\Jobs;

use App\Services\Notification\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PushNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $serviceMethod;

    protected $methodParams;

    /**
     * Notification constructor.
     * @param $serviceMethod
     * @param $methodParams
     * @param string $methodHttp
     */
    public function __construct($serviceMethod, $methodParams = [[]])
    {
        $this->serviceMethod = $serviceMethod;
        $this->methodParams = $methodParams;
    }

    /**
     * @param NotificationService $notificationService
     */
    public function handle(NotificationService $notificationService)
    {
        call_user_func_array(
            [
                $notificationService,
                $this->serviceMethod,
            ],
            $this->methodParams
        );
    }
}
