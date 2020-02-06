# Soft Credit Tokens

When sending emails based on soft credits (via CiviRules' "Soft Credit is added/edited/deleted" triggers), pull in information about the soft creditor (i.e. donor).

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.0+
* CiviCRM 5.23+

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl softcredittokens@https://github.com/FIXME/softcredittokens/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/FIXME/softcredittokens.git
cv en softcredittokens
```

## Usage

After installation, tokens will be available to pull in a donor's information.

## Known Issues

* The information is not specific to the soft credit in question, owing to limitations in the legacy token processor.  It will always pull the most recent soft credit for this individual.  When TokenProcessor covers this scenario the extension will be updated.
* Only first name/last name/display name are currently covered.  This could be relatively easily updated to cover all contact fields with a loop.
