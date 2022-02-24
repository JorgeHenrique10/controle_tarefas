<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    public $user;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $name, $email)
    {
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'http://localhost:8000/reset-password/' . $this->token . '?email=' . $this->email;
        return (new MailMessage)
            ->subject('Notificação para Redefinir a Senha')
            ->greeting("Olá $this->name")
            ->line('Você recebeu este email para poder redefinir a senha de sua conta no sistema')
            ->action('Resetar Senha', $url)
            ->line('O link expira em:' .  config('auth.passwords.' . config('auth.defaults.passwords') . '.minutos'))
            ->line('Se não foi solicitado uma redefinição de senha, favor desconsiderar o email.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
