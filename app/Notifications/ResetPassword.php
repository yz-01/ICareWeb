<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    public $token;
    public $type;

    public static $createUrlCallback;

    public static $toMailCallback;

    public function __construct($token, $type)
    {
        $this->token = $token;
        $this->type = $type;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = $this->resetUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token, $url);
        }

        return $this->buildMailMessage($url);
    }

    protected function resetUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            return url(route($this->type.'.password.showResetForm', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }
    }

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::get('Reset Password'), $url)
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }

    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
