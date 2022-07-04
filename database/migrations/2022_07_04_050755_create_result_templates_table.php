
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateResultTemplatesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("result_templates", function (Blueprint $table) {

						$table->increments('id');
						$table->string('name',255)->comment('診断結果名');
						$table->text('content')->comment('診断結果⽂章');
						$table->integer('min_point')->comment('最小ポイント');
						$table->integer('max_point')->comment('最大ポイント');
                        $table->timestamps();


						// ----------------------------------------------------
						// -- SELECT [result_templates]--
						// ----------------------------------------------------
						// $query = DB::table("result_templates")
						// ->get();
						// dd($query); //For checking



                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("result_templates");
            }
        }
    