describe('Loads the front page', () => {
  it('Loads the front page', () => {
    cy.visit('/')
    cy.get('h1.page-title')
      .should('exist')
  });
});

describe('Tests logging in using an incorrect password', () => {
  it('Fails authentication using incorrect login credentials', () => {
    cy.visit('/user/login')
    cy.get('#edit-name')
      .type('Sir Lancelot of Camelot')
    cy.get('#edit-pass')
      .type('tacos')
    cy.get('input#edit-submit')
      .contains('Log in')
      .click()
    cy.contains('Unrecognized username or password.')
  });

});
