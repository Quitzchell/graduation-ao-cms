describe('Navigation Test', () => {
    beforeEach(() => {
        cy.visit('/', {timeout: 60000});
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
                    .and('include', '/blog')
                cy.get('a').eq(2)
                    .should('have.attr', 'href')
                    .and('include', '/review')
            });

    });

    it('should navigate to homepage', {retries:2}, () => {
        cy.get('[data-cypress="navigation-home"]').click();
        cy.url().should('include', '/home');
        cy.contains('La gloire est éphémère, mais l\'oubli est éternel.').should('be.visible');
    })
    // it('should navigate to the Blog page', () => {
    //     cy.get('nav a[href="/blog"]')
    //         .should('exist')
    //         .and('be.visible');
    // });
    //
    // it('should navigate to the Review page', () => {
    //     cy.get('nav a[href="/review"]')
    //         .should('exist')
    //         .and('be.visible');
    // });

    // context('Mobile Navigation Flow', () => {
    //     beforeEach(() => {
    //         cy.viewport('iphone-6');
    //         cy.visit('/');
    //     });
    //
    //     it('should navigate to pages via the hamburger menu', () => {
    //         cy.get('button[aria-haspopup="dialog"]').click();
    //         cy.get('nav a[href="/home"]').click();
    //         cy.url().should('include', '/home');
    //         cy.contains('La gloire est éphémère, mais l\'oubli est éternel.').should('be.visible'); // Adjust text based on actual content
    //
    //         cy.visit('/');
    //         cy.get('button[aria-haspopup="dialog"]').click();
    //
    //         cy.get('nav a[href="/blog"]').click();
    //         cy.url().should('include', '/blog');
    //         cy.contains('Entries').should('be.visible');
    //
    //         cy.get('nav a[href="/review"]').click();
    //         cy.url().should('include', '/review');
    //         cy.contains('Reviews').should('be.visible');
    //     });
    // });
});
