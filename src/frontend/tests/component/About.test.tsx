import React from 'react';

import {render, screen} from '@testing-library/react';

import About from '@/blocks/home/About';

// A simple test case to check if the component renders the title and text correctly
describe('About Component with mock data', () => {
    test('renders the title and text', () => {
        const mockData = {
            title: 'About Us',
            text: '<p>This is the about section</p>',
        };

        // Render the component with the mock data
        render(<About {...mockData} />);

        // Check if the title is rendered
        const titleElement = screen.getByText('About Us');
        expect(titleElement).toBeInTheDocument();

        // Check if the HTML content is rendered correctly
        const textElement = screen.getByText('This is the about section');
        expect(textElement).toBeInTheDocument();
    });
});
