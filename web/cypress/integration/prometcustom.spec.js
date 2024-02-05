// cypress/integration/my_module.spec.js

describe('Promet Custom Module Test', () => {
  it('should load more content when "Load More" button is clicked', () => {
    // Visit the page where your Drupal module is displayed
    cy.visit('/path-to-your-drupal-page');

    // Assuming you have a button with the id "load-more-button"
    cy.get('#load-more-button').click();

    // Wait for the content to load (you may need to adjust the timeout)
    cy.wait(2000);

    // Assuming you have a container with the class "loaded-content"
    // Verify that the additional content is loaded
    cy.get('.loaded-content').should('exist');

    // You can add more assertions as needed to test your module's functionality
  });
});
