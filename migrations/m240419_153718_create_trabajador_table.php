<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trabajador}}`.
 */
class m240419_153718_create_trabajador_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trabajador}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'documento_identidad' => $this->string()->notNull(),
            'cargo' => $this->string()->notNull(),          
            'idsede' => $this->integer()->notNull(),          
        ]);

        $this->addForeignKey(
            'fk-trabajador-idsede',
            '{{%trabajador}}',
            'idsede',
            '{{%sede}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trabajador}}');
    }
}
