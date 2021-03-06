<?php

require_once 'softcredittokens.civix.php';
use CRM_Softcredittokens_ExtensionUtil as E;

function softcredittokens_civicrm_tokens(&$tokens) {
  $tokens['softcreditor']['softcreditor.display_name'] = 'Soft Creditor Display Name';
  $tokens['softcreditor']['softcreditor.first_name'] = 'Soft Creditor First Name';
  $tokens['softcreditor']['softcreditor.last_name'] = 'Soft Creditor Last Name';
  $tokens['softcreditor']['softcreditor.financial_type'] = 'Soft Creditor Financial Type';
}

function softcredittokens_civicrm_tokenValues(&$values, $cids, $job = NULL, $tokens = [], $context = NULL) {
  // Ugh, hook called different ways.  Always convert to array.
  if (!is_array($cids)) {
    $cids = [$cids];
  }
  // Soft Creditor Tokens.
  if ($tokens['softcreditor'] ?? FALSE) {
    foreach ($cids as $cid) {
      $contacts = civicrm_api3('ContributionSoft', 'get', [
        'sequential' => 1,
        'return' => [
          "contribution_id.contact_id.display_name",
          "contribution_id.contact_id.first_name",
          "contribution_id.contact_id.last_name",
          "contact_id",
          'contribution_id.financial_type_id.name',
        ],
        'contact_id' => $cid,
        'options' => ['sort' => "id DESC", 'limit' => 1],
      ]);
      $values[$cid]['softcreditor.display_name'] = $contacts['values'][0]['contribution_id.contact_id.display_name'];
      $values[$cid]['softcreditor.first_name'] = $contacts['values'][0]['contribution_id.contact_id.first_name'];
      $values[$cid]['softcreditor.last_name'] = $contacts['values'][0]['contribution_id.contact_id.last_name'];
      $values[$cid]['softcreditor.financial_type'] = $contacts['values'][0]['contribution_id.financial_type_id.name'];
    }
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/ 
 */
function softcredittokens_civicrm_config(&$config) {
  _softcredittokens_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function softcredittokens_civicrm_xmlMenu(&$files) {
  _softcredittokens_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function softcredittokens_civicrm_install() {
  _softcredittokens_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function softcredittokens_civicrm_postInstall() {
  _softcredittokens_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function softcredittokens_civicrm_uninstall() {
  _softcredittokens_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function softcredittokens_civicrm_enable() {
  _softcredittokens_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function softcredittokens_civicrm_disable() {
  _softcredittokens_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function softcredittokens_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _softcredittokens_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function softcredittokens_civicrm_managed(&$entities) {
  _softcredittokens_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function softcredittokens_civicrm_caseTypes(&$caseTypes) {
  _softcredittokens_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function softcredittokens_civicrm_angularModules(&$angularModules) {
  _softcredittokens_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function softcredittokens_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _softcredittokens_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function softcredittokens_civicrm_entityTypes(&$entityTypes) {
  _softcredittokens_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function softcredittokens_civicrm_themes(&$themes) {
  _softcredittokens_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function softcredittokens_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function softcredittokens_civicrm_navigationMenu(&$menu) {
  _softcredittokens_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _softcredittokens_civix_navigationMenu($menu);
} // */
