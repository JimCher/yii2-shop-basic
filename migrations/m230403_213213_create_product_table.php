<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230403_213213_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'content' => $this->text(),
            'price' => $this->float()->notNull(),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'img' => $this->string()->defaultValue('no-image.png'),
            'hit' => 'ENUM("0","1") NOT NULL DEFAULT "0"',
            'new' => 'ENUM("0","1") NOT NULL DEFAULT "0"',
            'sale' => 'ENUM("0","1") NOT NULL DEFAULT "0"',
        ]);

        $this->createIndex(
            'idx-product-category_id',
            'category',
            'category_id'
        );

        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
