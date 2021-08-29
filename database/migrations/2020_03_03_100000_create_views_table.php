<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;

class CreateViewsTable extends Migration
{
    protected Builder|Schema $schema;

    protected string $table;

    public function __construct()
    {
        $this->schema = Schema::connection(
            config('eloquent-viewable.models.view.connection')
        );

        $this->table = config('eloquent-viewable.models.view.table_name');
    }

    public function up(): void
    {
        $this->schema->create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('viewable');
            $table->text('visitor')->nullable();
            $table->string('collection')->nullable();
            $table->timestamp('viewed_at')->useCurrent();
        });
    }
}
