<?php 
use yii\db\Migration;

class m160725_120000_dump extends Migration
{
    public function up()
    {
        $this->createTable('ingredient', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'varchar(255) DEFAULT NULL',
            'visible' => ' tinyint(1) DEFAULT "1"',
        ]);
        
        $this->createTable('recipe', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'varchar(255) DEFAULT NULL',
        ]);
        
        $this->createTable('recipe_ingredient', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'recipe_id' => 'int(11) NOT NULL',
            'ingredient_id' => 'int(11) NOT NULL',
        ]);
        $this->db->createCommand("insert  into `ingredient`(`id`,`name`,`visible`) values (1,'Сыр',1),(2,'Укроп',1),(3,'Салат',1),(4,'Сухарики',1),(5,'Майонез',1),(6,'Томат',1),(7,'Огурец',1),(8,'Редиска',1),(9,'Перец',1),(10,'Масло',1),(11,'Курица',1),(12,'Горох',1),(13,'Мясо',1),(14,'Колбаса',1),(16,'Марковь',0);")->execute();
        $this->db->createCommand("insert  into `recipe`(`id`,`name`) values (1,'Цезарь'),(2,'Марковный'),(3,'Помидор огурец');")->execute();
        $this->db->createCommand("insert  into `recipe_ingredient`(`id`,`recipe_id`,`ingredient_id`) values (1,1,1),(2,1,5),(3,1,7),(4,1,9),(7,1,6),(8,2,1),(9,2,5),(10,2,9),(11,2,16),(12,3,10),(13,3,7),(14,3,6),(15,3,5),(16,3,9);")->execute();
    }

    public function down()
    {
        $this->dropTable('ingredient');
        $this->dropTable('recipe');
        $this->dropTable('recipe_ingredient');
    }
}