const { defineConfig } = require("cypress");

module.exports = defineConfig({
  component: {
    fixturesFolder: "cypress/fixtures",
    integrationFolder: "cypress/integration",
    pluginsFile: "cypress/plugins/index.js",
    screenshotsFolder: "cypress/screenshots",
    supportFile: "cypress/support/e2e.js",
    videosFolder: "cypress/videos",
    viewportWidth: 1440,
    viewportHeight: 900,
  },

  e2e: {
    setupNodeEvents(on, config) {
      // `on` is used to hook into various events Cypress emits
      // `config` is the resolved Cypress config
      // Set the baseUrl from the environment if available
      const baseUrl = config.env.baseUrl || null;
      if (baseUrl) {
        config.baseUrl = baseUrl;
      }
      // Configure the local drush command form the environment
      const drushCommand = config.env.drushCommand || 'ddev drush ';
      config.drushCommand = drushCommand;

      return config;
  },
    baseUrl: "http://promet.ddev.site",
    specPattern: "cypress/**/*.{js,jsx,ts,tsx}",
    supportFile: "cypress/support/e2e.js",
    fixturesFolder: "cypress/fixtures"
  },
});
