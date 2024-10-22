import blog from '../fixtures/blog.json'
describe('Blog overview Tests', () => {
    beforeEach(() => {
        cy.visit('/blog', {timeout: 60000});
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
            console.log(expected)

            // Test the title
            cy.wrap(card).find('h3').should('be.visible').and('contain.text', expected.title);

            // Test the category
            cy.wrap(card).find('p').eq(0).should('contain.text', `Category: ${expected.category}`);

            // Test the publication date
            cy.wrap(card).find('p').eq(1).should('contain.text', `Published at: ${expected.publishedAt}`);

            // Test the description content
            cy.wrap(card).find('p').eq(2).should('contain.text', expected.description);

            // Test the "Read more" button
            cy.wrap(card).find('a').should('have.attr', 'href', expected.readMoreLink);
        });
    });
});
