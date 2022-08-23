<?php

namespace App\Notifications;

use http\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Http\Client\Request;
use GuzzleHttp\Client as GuzzleClient;;


use Illuminate\Notifications\Notifiable;

class ArticlePublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }
    public function toTelegram($article)

    {
           $telegram_id=Config::get('services.telegram_id');

             return TelegramMessage::create()

               ->to('@economician_per')

             ->content($article->title.'https://proskillsnews.com'. $article->mainContent);

}


    /*public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
