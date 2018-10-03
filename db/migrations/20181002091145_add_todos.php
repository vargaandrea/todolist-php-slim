<?php


use Phinx\Migration\AbstractMigration;

class AddTodos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('todo');
        
        $table->changeColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP']);
        
        // inserting multiple rows
        $rows = [
            [
                'id'    => 1,
                'user_id'  => 1,
                'text'  => 'add PHPUnit',
                'due_date' => '2018.10.04',
            ],
            [
                'id'    => 2,
                'user_id'  => 1,
                'text'  => 'learn jQuery / ajax calls',
                'due_date' => '2018.10.04'
            ],
            [
                'id'    => 3,
                'user_id'  => 1,
                'text'  => 'master composer, autoloader and namespaces',
                'due_date' => '2018.10.04'
            ],
            [
                'id'    => 4,
                'user_id'  => 1,
                'text'  => 'handle JSON in php and JavaScript',
                'due_date' => '2018.10.04'
            ]
        ];
        
        $table->insert($rows)->save();
    }
}
