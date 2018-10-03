<?php


use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration
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
        $this->creaateUser();
        $this->createTodo();
    }
    
    private function creaateUser() 
    {
        
        $table = $this->table('user', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table->addColumn('id', 'integer', [
                    'identity' => true,
                    'signed' => false
                ])
                ->addColumn('first', 'string')
                ->addColumn('last', 'string')
                ->addColumn('email', 'string')
                ->addColumn('password_hash', 'string')
                ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();
            
        // inserting multiple rows
        $rows = [
            [
                'id'    => 1,
                'first'  => 'Andrea',
                'last'  => 'Varga',
                'email' => 'andi@narancs.net',
                'password_hash' => password_hash('1234', PASSWORD_DEFAULT, ['cost' => 12])
            ],
            [
                'id'    => 2,
                'first'  => 'Johnny',
                'last'  => 'Test',
                'email' => 'jhonny@test.net',
                'password_hash' => password_hash('test', PASSWORD_DEFAULT, ['cost' => 12])
            ]
        ];
        
        $table->insert($rows)->save();
    }
    
    private function createTodo()
    {
        
        $table = $this->table('todo', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table->addColumn('id', 'integer', [
                    'identity' => true,
                    'signed' => false
                ])
                ->addColumn('user_id','integer')
                ->addColumn('text', 'string')
                ->addColumn('due_date', 'datetime')
                ->addColumn('created', 'datetime')
                ->create();
    }
}
