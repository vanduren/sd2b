php artisan make:migration create_regions_stores_table
content:
    public function up(): void
    {
        Schema::create('authors_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained()->cascadeOnDelete();
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

