const defaultConfiguration = require( '@wordpress/scripts/config/webpack.config' );
const removeEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const path = require( 'path' );

module.exports = {
	...defaultConfiguration,
	...{
		entry: {
			'admin/scripts/hqfw-admin': path.resolve(
				process.cwd(),
				'resources/admin/scripts',
				'hqfw-admin.js'
			),
			'admin/styles/hqfw-admin': path.resolve(
				process.cwd(),
				'resources/admin/styles',
				'hqfw-admin.scss'
			),
            'admin/styles/hqfw-home': path.resolve(
				process.cwd(),
				'resources/admin/styles',
				'hqfw-home.scss'
			),
			'client/scripts/hqfw-client': path.resolve(
				process.cwd(),
				'resources/client/scripts',
				'hqfw-client.js'
			),
		},
		plugins: [
			...defaultConfiguration.plugins,
			new removeEmptyScriptsPlugin( {
				stage: removeEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
			} ),
		],
	},
};
