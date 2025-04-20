<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\Notification as FcmNotification;
use App\Models\DonationRequest;

class DonationRequestCreated extends Notification
{
    use Queueable;

    protected $donationRequest;

    public function __construct(DonationRequest $donationRequest)
    {
        $this->donationRequest = $donationRequest;
    }

    public function via($notifiable)
    {
        return ['database', FcmChannel::class];
    }

    // ✅ قاعدة البيانات
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'طلب تبرع جديد',
            'body' => 'حالة بحاجة لفصيلة دمك في ' . optional($this->donationRequest->city)->name,
            'donation_request_id' => $this->donationRequest->id,
        ];
    }

    // ✅ إشعار FCM
    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData([
                'donation_request_id' => (string) $this->donationRequest->id,
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
            ])
            ->setNotification(
                FcmNotification::create()
                    ->setTitle('طلب تبرع جديد')
                    ->setBody('حالة بحاجة لفصيلة دمك في ' . optional($this->donationRequest->city)->name)
            );
    }
}
