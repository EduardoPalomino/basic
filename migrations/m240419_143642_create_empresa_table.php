<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%empresa}}`.
 */
class m240419_143642_create_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empresa}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'ruc' => $this->string()->notNull(),
            'razon_social' => $this->string()->notNull(),
            'direccion' => $this->string()->notNull(),           
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%empresa}}');
    }
}
