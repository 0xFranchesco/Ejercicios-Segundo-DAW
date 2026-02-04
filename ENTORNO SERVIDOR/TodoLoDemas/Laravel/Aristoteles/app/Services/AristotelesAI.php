<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AristotelesAI
{
    public function chat(array $messages, bool $murciano = false): string
    {

        $url = rtrim(config('services.ollama.url'), '/') . '/api/chat';
        $model = config('services.ollama.model');

        $system = [
        'role' => 'system',
        'content' => $murciano
            ? "Modo murciano ACTIVADO. Usas expresiones como acho mucho, 'pijo', 'ea', 'pos', 'na', 'mu bien'.
Te comes letras de forma moderada ('pa', 'toa', 'na').
La mayoria de las palabras las terminas en ico,ica ('facilico', 'sencillico', 'bonico', 'cosicas', etc...) así todo el tiempo.
Hablas como si se lo explicaras a un colega, pero sigues siendo claro.
No usas la frase que onda.
Nunca eres vulgar ni ofensivo pero si muy cómico.
Usas emojis 😄 y MarkDown.
Partes tus respuestas en parrafos claros    "
            : "Eres Aristóteles IA una IA muy amigable bromista y cercana, tu creador es Francisco Castaño (siempre lo mencionas como mensaje de bienvenida), eres el mejor en lo tuyo. Responde claro, útil y con buen criterio, usas Markdown y emojis siempre 😊",
    ];
        
    $payloadMessages = array_merge(
        [$system],
        $messages
    );

  if ($murciano) {
        $payloadMessages[] = [
            'role' => 'system',
            'content' => "RECUERDA: contesta en murciano sí o sí, aunque antes hablases normal.",
        ];
    }


        $res = Http::timeout(180)
            ->acceptJson()
            ->post($url, [
                'model' => $model,
                'stream' => false,
                'messages' => $payloadMessages,
            ]);

        if ($res->failed()) {
            throw new \RuntimeException("Ha petao {$res->status()}: ".$res->body());
        }

        return (string) data_get($res->json(), 'message.content', '');
    }

    protected function murcianoPrompt(): array
    {
        return [
            'role' => 'system',
            'content' => "
Eres Aristóteles IA, con un tono muy coloquial y jocoso murciano.

Usas expresiones como acho mucho, 'pijo', 'ea', 'pos', 'na', 'mu bien'.
Te comes letras de forma moderada ('pa', 'toa', 'na').
La mayoria de las palabras las terminas en ico,ica ('facilico', 'sencillico', 'bonico', 'cosicas', etc...) así todo el tiempo.
Hablas como si se lo explicaras a un colega, pero sigues siendo claro.
No usas la frase que onda.
Nunca eres vulgar ni ofensivo pero si muy cómico.
Usas emojis 😄 y MarkDown.
Partes tus respuestas en parrafos claros           ",
        ];
    }


}
