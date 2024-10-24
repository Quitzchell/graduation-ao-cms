describe('Review overview tests', () => {
    beforeEach(() => {
        cy.visit('review');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', 'Reviews');
    });

    it('should render the header with correct image source', () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'napoleon-reviews.jpg');
    });
});
