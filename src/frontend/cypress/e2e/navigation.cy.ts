if (!Cypress.isBrowser('electron')) {
    describe('Navigation test', () => {
        beforeEach(() => {
            cy.clearCookies();
            cy.clearLocalStorage();
            cy.wait(2000)
            cy.visit('/home');
            cy.viewport(1280, 1240)
        });

        it('should render the navigation bar', () => {
            cy.get('[data-cypress="navigation"]')
                .should('exist')
                .and('be.visible')
                .within(() => {
                    cy.get('a').eq(0)
                        .should('have.attr', 'href')
                        .and('include', '/home');
                    cy.get('a').eq(1)
                        .should('have.attr', 'href')
                        .and('include', '/blog');
                    cy.get('a').eq(2)
                        .should('have.attr', 'href')
                        .and('include', '/review');
                });
        });

        it('should navigate to homepage', () => {
            cy.get('[data-cypress="navigation-home"]').click();
            cy.url().should('include', '/home');
            cy.contains('La gloire est éphémère, mais l\'oubli est éternel.').should('be.visible');
        });

        it('should navigate to Blog page', () => {
            cy.get('[data-cypress="dynamic-link"]').eq(0).click();
            cy.url().should('include', '/blog');
            cy.contains('Entries').should('be.visible');
        });

        it('should navigate to Review page', () => {
            cy.get('[data-cypress="dynamic-link"]').eq(1).click();
            cy.url().should('include', '/review');
            cy.contains('Reviews').should('be.visible');
        });
    });
} else {
    describe('Navigation test (Skipped in Electron)', () => {
        it('Skipping test suite on Electron', () => {
            cy.log('Tests are skipped in Electron');
        });
    });
}
