
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('origem', 20)
                ->default('youtube');

            $table->string('ficheiro_video')
                ->nullable();

            $table->string('url_video', 500)
                ->nullable()
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn([
                'origem',
                'ficheiro_video',
            ]);

            $table->string('url_video', 500)
                ->nullable(false)
                ->change();
        });
    }
};
