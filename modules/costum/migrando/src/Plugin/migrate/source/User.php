<?php
/**
 * @file
 * Contains \Drupal\migrando\Plugin\migrate\source\User.
 */

namespace Drupal\migrando\Plugin\migrate\source;

use Drupal\migrate\Row;
use Drupal\migrate_drupal\Plugin\migrate\source\DrupalSqlBase;

/**
 * Extract users from Drupal 7 database.
 *
 * @MigrateSource(
 *   id = "custom_user"
 * )
 */
class User extends DrupalSqlBase {

    /**
     * {@inheritdoc}
     */
    public function query() {
        return $this->select('users', 'u')
            ->fields('u', array_keys($this->baseFields()))
            ->condition('uid', 0, '>');
    }

    /**
     * {@inheritdoc}
     */
    public function fields() {
        $fields = $this->baseFields();
        $fields['nickname'] = $this->t('Nickname');
        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRow(Row $row) {
        $uid = $row->getSourceProperty('uid');

        // nickname
        $result = $this->getDatabase()->query('
      SELECT
        fld.field_nickname_value
      FROM
        {field_data_field_nickname} fld
      WHERE
        fld.entity_id = :uid
    ', array(':uid' => $uid));
        foreach ($result as $record) {
            $row->setSourceProperty('nickname', $record->field_nickname_value );
        }

        return parent::prepareRow($row);
    }

    /**
     * {@inheritdoc}
     */
    public function getIds() {
        return array(
            'uid' => array(
                'type' => 'integer',
                'alias' => 'u',
            ),
        );
    }

    /**
     * Returns the user base fields to be migrated.
     *
     * @return array
     *   Associative array having field name as key and description as value.
     */
    protected function baseFields() {
        $fields = array(
            'uid' => $this->t('User ID'),
            'name' => $this->t('Username'),
            'pass' => $this->t('Password'),
            'mail' => $this->t('Email address'),
            'signature' => $this->t('Signature'),
            'signature_format' => $this->t('Signature format'),
            'created' => $this->t('Registered timestamp'),
            'access' => $this->t('Last access timestamp'),
            'login' => $this->t('Last login timestamp'),
            'status' => $this->t('Status'),
            'timezone' => $this->t('Timezone'),
            'language' => $this->t('Language'),
            'picture' => $this->t('Picture'),
            'init' => $this->t('Init'),
            'uuid' => $this->t('UUID'),
        );
        return $fields;

    }

    /**
     * {@inheritdoc}
     */
    public function bundleMigrationRequired() {
        return FALSE;
    }

    /**
     * {@inheritdoc}
     */
    public function entityTypeId() {
        return 'user';
    }

}
?>