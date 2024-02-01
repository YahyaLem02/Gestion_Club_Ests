<?

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToExistingColumns extends Migration
{
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reclamation_id')->references('NumReclamation')->on('reclamations')->onDelete('cascade');
        });

        Schema::table('reclamations', function (Blueprint $table) {
            $table->foreign('adherant_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Si tu as besoin de faire un rollback, tu peux supprimer les contraintes de cette manière
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['reclamation_id']);
        });

        Schema::table('reclamations', function (Blueprint $table) {
            $table->dropForeign(['adherant_id']);
            $table->dropForeign(['club_id']);
        });
    }
}
