import blog from '../fixtures/blog.json'

describe('Blog overview tests', () => {
    beforeEach(() => {
        cy.clearCookies();
        cy.clearLocalStorage();
        cy.wait(2000)
        cy.visit('/blog');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', "Entries");
    });

    it('should render the header with correct image source', {retries: 2}, () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'napoleon-reading.jpg');
    });

    it('should display multiple blogpost-cards with correct data', () => {
        cy.get('[data-cypress="blogpost-card"]').each((card, index) => {
            const expected = blog.blog_cards[index];
            cy.wrap(card).find('h3').should('be.visible').and('contain.text', expected.title);
            cy.wrap(card).find('p').eq(0).should('contain.text', `Category: ${expected.category}`);
            cy.wrap(card).find('p').eq(1).should('contain.text', `Published at: ${expected.publishedAt}`);
            cy.wrap(card).find('p').eq(2).should('contain.text', expected.description);
            cy.wrap(card).find('a').should('have.attr', 'href', expected.readMoreLink);
        });
    });
});
