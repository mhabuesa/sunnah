    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();

                $table->string('name')->nullable();
                $table->string('phone')->unique();
                $table->string('email')->nullable()->unique();
                $table->string('address')->nullable();
                $table->string('image')->nullable();
                $table->boolean('status')->default(1);
                $table->index('status');
                $table->timestamps();
                $table->index('created_at');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('customers');
        }
    };