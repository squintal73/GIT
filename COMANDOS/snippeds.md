// Place your global snippets here. Each snippet is defined under a snippet
	// @prefix : SRQ - Snippets
	// @Author : Squintal
	// @Lasted : 07062021
	// @Version: V.0.02

	"Php": {
		"prefix": "pp",
		"body": [
			"<php?",
			 "$1",
			 "?>",
		],
		"description": "<PHP></PHP>"
	},
	"Db1": {
		"prefix": "ds",
		"body": [
			"echo '<PRE>';",
			"print_r('Debuger');die;",
		],
		"description": "PRINT DIE"
	}
	,
	"Db2": {
		"prefix": "df",
		"body": [
			"echo '<PRE>';",
			"print_r($1);die;",
		],
		"description": "PRINT DIE"
	},

	"Db3": {
		"prefix": "dfd",
		"body": [
			"infra_conam::dbg_var($1);",
		],
		"description": "dbg_abort"
	},
}
