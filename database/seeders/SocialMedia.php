<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMedia extends Seeder
{
    public function run(): void
    {
        $socialLinks = [
            ['Facebook',  'https://facebook.com/dummy'],
            ['Instagram', 'https://instagram.com/dummy'],
            ['Twitter',   'https://twitter.com/dummy'],
            ['LinkedIn',  'https://linkedin.com/company/dummy'],
            ['YouTube',   'https://youtube.com/@dummy'],
            ['TikTok',    'https://tiktok.com/@dummy'],
            ['Pinterest', 'https://pinterest.com/dummy'],
            ['Snapchat',  'https://snapchat.com/add/dummy'],
            ['Reddit',    'https://reddit.com/user/dummy'],
            ['Tumblr',    'https://dummy.tumblr.com'],
            ['WhatsApp',  'https://wa.me/00000000000'],
            ['Telegram',  'https://t.me/dummy'],
            ['Vimeo',     'https://vimeo.com/dummy'],
            ['Discord',   'https://discord.gg/dummy'],
            ['GitHub',    'https://github.com/dummy'],
            ['Dribbble',  'https://dribbble.com/dummy'],
            ['Behance',   'https://behance.net/dummy'],
            ['Flickr',    'https://flickr.com/photos/dummy'],
            ['Medium',    'https://medium.com/@dummy'],
            ['Spotify',   'https://open.spotify.com/user/dummy'],
        ];

        foreach ($socialLinks as $link) {
            DB::table('settings')->insert([
                'type'  => 'social-media',
                'title' => $link[0],
                'data'  => $link[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
