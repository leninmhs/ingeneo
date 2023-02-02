<?php

declare(strict_types=1);

namespace bizley\tests\cases;

use Yii;
use bizley\tests\migrations\m180328_205900_drop_column_one_from_table_test_multiple;
use yii\base\ErrorException;
use yii\base\NotSupportedException;
use yii\db\Exception;

class UpdaterTestCase extends DbMigrationsTestCase
{
    protected function tearDown(): void
    {
        $this->dbDown('ALL');
        parent::tearDown();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testDropPrimaryKey(): void
    {
        $this->dbUp('test_pk_composite');

        Yii::$app->db->createCommand()->dropPrimaryKey('PRIMARYKEY', 'test_pk_composite')->execute();

        $updater = $this->getUpdater('test_pk_composite');
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertNotEmpty($updater->plan->dropPrimaryKey);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testDropForeignKey(): void
    {
        $this->dbUp('test_pk');
        $this->dbUp('test_fk');

        Yii::$app->db->createCommand()->dropForeignKey('fk-test_fk-pk_id', 'test_fk')->execute();

        $updater = $this->getUpdater('test_fk');
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertEquals(['fk-test_fk-pk_id'], $updater->plan->dropForeignKey);
        $this->assertEmpty($updater->plan->alterColumn);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testAddForeignKey(): void
    {
        $this->dbUp('test_pk');
        $this->dbUp('test_int_general');

        Yii::$app->db->createCommand()->addForeignKey(
            'fk-test_int_general-col_int',
            'test_int_general',
            'col_int',
            'test_pk',
            'id'
        )->execute();

        $updater = $this->getUpdater('test_int_general');
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertArrayHasKey('fk-test_int_general-col_int', $updater->plan->addForeignKey);
        $this->assertEmpty($updater->plan->alterColumn);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testDropIndex(): void
    {
        $this->dbUp('test_index_single');

        Yii::$app->db->createCommand()->dropIndex('idx-test_index_single-col', 'test_index_single')->execute();

        $updater = $this->getUpdater('test_index_single');
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertEquals(['idx-test_index_single-col'], $updater->plan->dropIndex);
        $this->assertEmpty($updater->plan->alterColumn);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testAddIndex(): void
    {
        $this->dbUp('test_int_general');

        Yii::$app->db->createCommand()->createIndex('idx-test_int_general-col_int', 'test_int_general', 'col_int')->execute();

        $updater = $this->getUpdater('test_int_general');
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertArrayHasKey('idx-test_int_general-col_int', $updater->plan->createIndex);
        $this->assertEmpty($updater->plan->alterColumn);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testMultipleMigrations(): void
    {
        $this->dbUp('test_multiple');

        Yii::$app->db->createCommand()->addColumn('test_multiple', 'three', $this->integer())->execute();

        $updater = $this->getUpdater('test_multiple');
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertArrayHasKey('three', $updater->plan->addColumn);
        $this->assertArrayNotHasKey('one', $updater->oldTable->columns);
        $this->assertEmpty($updater->plan->alterColumn);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws Exception
     * @throws ErrorException
     * @throws NotSupportedException
     */
    public function testMultipleMigrationsWithSkip(): void
    {
        $this->dbUp('test_multiple_skip');

        Yii::$app->db->createCommand()->addColumn('test_multiple', 'three', $this->integer())->execute();

        $updater = $this->getUpdater(
            'test_multiple',
            true,
            [m180328_205900_drop_column_one_from_table_test_multiple::class]
        );
        $this->assertTrue($updater->isUpdateRequired());
        $this->assertArrayHasKey('three', $updater->plan->addColumn);
        $this->assertArrayHasKey('one', $updater->oldTable->columns);
        $this->assertEmpty($updater->plan->alterColumn);
    }
}
