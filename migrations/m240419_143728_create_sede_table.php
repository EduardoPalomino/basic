<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sede}}`.
 */
class m240419_143728_create_sede_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sede}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'direccion' => $this->string()->notNull(),
            'direccion' => $this->string()->notNull(), 
            'idempresa' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-sede-idempresa',
            '{{%sede}}',
            'idempresa',
            '{{%empresa}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sede}}');
    }
}
