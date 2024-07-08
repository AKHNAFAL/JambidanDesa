<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\post_komentar;
// use Illuminate\Support\Facades\Log;
use LucianoTonet\GroqPHP\Groq;
use Illuminate\Support\Facades\Log;

class WebUserController extends Controller
{

    public function index()
    {
        $post_komentar = post_komentar::orderBy('tanggal_post', 'desc')->get();

        // Menyiapkan query untuk mendapatkan list data komentar beserta tanggal posting
        $komentarList = $post_komentar->map(function ($item) {
            return [
                'komentar' => $item->komentar,
                'tanggal_post' => $item->tanggal_post
            ];
        })->toArray();

        $komentarData = $post_komentar->map(function ($item) {
            return [
                'user_id' => $item->user_id,
                'tanggal_post' => $item->tanggal_post
            ];
        })->toArray();

        // Format data komentar
        $formattedKomentar = "";
        foreach ($komentarList as $index => $komentar) {
            $formattedKomentar .= ($index + 1) . ". " . $komentar['komentar'] . " (" . $komentar['tanggal_post'] . ")\n";
        }

        return view('kelola-web-user', [
            'komentar' => $post_komentar,
            'komentarData' => $komentarData
        ]);
    }

    public function getTopics()
    {
        try {
            $post_komentar = post_komentar::orderBy('tanggal_post', 'desc')->get();

            // Menyiapkan query untuk mendapatkan list data komentar beserta tanggal posting
            $komentarList = $post_komentar->map(function ($item) {
                return [
                    'komentar' => $item->komentar,
                    'tanggal_post' => $item->tanggal_post
                ];
            })->toArray();

            // Format data komentar
            $formattedKomentar = "";
            foreach ($komentarList as $index => $komentar) {
                $formattedKomentar .= ($index + 1) . ". " . $komentar['komentar'] . " (" . $komentar['tanggal_post'] . ")\n";
            }
            
            $promptContent = "Dari komentar-komentar berikut ini, buatlah ringkasan pembahasan utama warga desa dari tanggal yang paling awal sampai tanggal terakhir.
                            Ringkasan pembahasan harus mencakup poin-poin utama yang dibahas dalam komentar:\n\n$formattedKomentar\n\n
                            Berdasarkan komentar-komentar tersebut, buatlah ringkasan dengan poin-poin utama dalam format JSON. Format JSON harus hanya berisi nama objek luarannya 'topics' dan isi objek tersebut adalah atribut 'topic' yang berisi 
                            nama topik (Harus jelas dan spesifik), 'date' yang berisi string tanggal format yy-mm-dd - yy-mm-dd atau hanya yy-mm-dd untuk topik yang hanya dibahas di tanggal itu saja,
                            dan 'breakdown' yang berisi rangkaian string, masing-masing mewakili poin utama yang dibahas. Semua unsur output wajib menggunakan bahasa Indonesia dan anda wajib memastikan semua topik yang ada dikumpulan
                            komentar tersebut telah diringkas tanpa menyisakannya";

            $groq = new Groq('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');
            $chatCompletion = $groq->chat()->completions()->create([
                'model'    => 'mixtral-8x7b-32768',
                'messages' => [
                    [
                        'role'    => 'system',
                        'content' => 'Anda adalah API dan hanya akan merespons dengan JSON.'
                    ],
                    [
                        'role'    => 'user',
                        'content' => " " . $promptContent,
                    ]
                ],
                'temperature' => 0,
                'max_tokens' => 32768,
                'top_p' => 1,
                'stream' => false,
                'response_format' => [
                    'type' => 'json_object'
                ],
                'stop' => null
            ]);

            $result = json_decode($chatCompletion['choices'][0]['message']['content'], true);
        } catch (\Exception $e) {
            // Handle the exception
            $result = "ERROR";
            Log::error($e->getMessage());
        }
        return response()->json($result);
    }
}
