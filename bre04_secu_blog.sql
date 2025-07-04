-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : lun. 30 juin 2025 à 08:29
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saidtalbi_secu_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(511) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Development', 'Posts about development and life as a developer'),
(2, 'Design', 'Posts about challenges and evolutions in design'),
(3, 'Accessibility', 'Posts about accessibility and inclusiveness');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(2047) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`) VALUES
(1, 'That is kind of cool', 1, 3),
(2, 'I am not sure I have a full understanding of it but it seems fascinating', 3, 1),
(3, 'Great post, good grasp on the base material', 3, 5),
(4, 'Nice', 1, 6),
(5, 'First', 3, 4),
(6, 'Holy molly that was a lot', 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `content` varchar(20000) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `author`, `created_at`) VALUES
(1, 'Navigating the Digital Canvas: Unveiling the Art of Intuitive Web Design', 'In the realm of intuitive web design, aesthetics play a pivotal role.', '<h2>The Aesthetic Symphony:</h2>\r\n    <p>\r\n        In the realm of intuitive web design, aesthetics play a pivotal role. A well-crafted interface \r\n        not only captures attention but guides users seamlessly. Imagine a symphony of colors that \r\n        evoke emotions and a typography dance that leads the eye.\r\n    </p>\r\n\r\n    <h2>Responsive Choreography:</h2>\r\n    <p>\r\n        Intuitiveness extends beyond mere visuals. Responsive design choreography ensures that the \r\n        dance continues flawlessly across devices. Witness the magic in action through this responsive \r\n        design illustration where the elements gracefully adapt to various screen sizes, providing a \r\n        consistent and delightful experience.\r\n    </p>\r\n\r\n    <h2>Typography Ballet:</h2>\r\n    <p>\r\n        Typography is the unsung hero of web design. A well-selected font can turn a mere webpage \r\n        into a captivating story. Explore the art of typography ballet with this illustration of \r\n        elegant font choices that elevate the reading experience and contribute to the overall aesthetic \r\n        charm.\r\n    </p>\r\n\r\n    <h2>Future Horizons:</h2>\r\n    <p>\r\n        The digital canvas is ever-evolving, and designers must keep an eye on future trends. Dive \r\n        into the possibilities with this futuristic web design concept that explores innovative layouts, \r\n        interactions, and technologies shaping the web of tomorrow.\r\n    </p>\r\n\r\n    <p>\r\n        As you embark on your journey through the digital canvas, remember that intuitive web design \r\n        is not just about creating websites; it\'s about crafting immersive experiences. The art lies \r\n        in understanding the user\'s journey and orchestrating a symphony that resonates with every click, \r\n        scroll, and interaction.\r\n    </p>', 1, '2021-01-21 07:03:04'),
(2, 'Behind the Screens: Crafting Seamless User Experiences with Responsive Design Magic', 'Welcome to the enchanting realm where screens come to life', '<h2>The Alchemy of Responsive Design:</h2>\r\n    <p>\r\n        Welcome to the enchanting realm where screens come to life, and user experiences are crafted\r\n        with the magic of responsive design. In the world of web development, creating seamless\r\n        interactions across devices is an art form, an alchemy that turns code into captivating\r\n        experiences.\r\n    </p>\r\n\r\n    <h2>The Dance of Flexbox and Grid:</h2>\r\n    <p>\r\n        Responsive design magic unfolds through the intricate dance of Flexbox and Grid. These layout\r\n        tools bring order to the chaos of varying screen sizes. Witness the ballet of elements,\r\n        showcasing the harmonious arrangement that adapts effortlessly to different devices.\r\n    </p>\r\n\r\n    <h2>Media Queries: A Symphony of Adaptation:</h2>\r\n    <p>\r\n        Enter the symphony of Media Queries, where the design composition adjusts its notes based on\r\n        the device\'s characteristics. Explore the versatility of responsive styles, ensuring a\r\n        harmonious display whether on a desktop, tablet, or smartphone.\r\n    </p>\r\n\r\n    <h2>Performance Elegance with Image Optimization:</h2>\r\n    <p>\r\n        Crafting seamless experiences also involves optimizing images for performance. Delve into the\r\n        elegance of image optimization, where large files transform into nimble assets, enhancing the\r\n        overall loading speed and user satisfaction.\r\n    </p>\r\n\r\n    <h2>Mobile-First Design Philosophy:</h2>\r\n    <p>\r\n        The responsive magic reaches its peak with a Mobile-First design philosophy. Uncover the\r\n        principles of Mobile-First, emphasizing a user-centric approach that starts with mobile devices\r\n        and expands to larger screens.\r\n    </p>\r\n\r\n    <p>\r\n        As you peer behind the screens, remember that the magic of responsive design lies in the\r\n        harmony between code and user experience. Each line of code contributes to creating a seamless\r\n        journey for users across the vast landscape of digital devices.\r\n    </p>', 2, '2020-04-11 03:03:04'),
(3, 'Coding Chronicles: Navigating the Ever-Evolving Landscape of Web Development', 'Over the years, HTML has transformed from a simple markup language', '<h2>The Evolution of HTML:</h2>\r\n    <p>\r\n        Over the years, HTML has transformed from a simple markup language to a robust structure\r\n        defining the backbone of web content. Let\'s explore the evolution with a basic example:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            &lt;!DOCTYPE html&gt;\r\n            &lt;html lang=\'en\'&gt;\r\n            &lt;head&gt;\r\n                &lt;meta charset=\'UTF-8\'&gt;\r\n                &lt;meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'&gt;\r\n                &lt;title&gt;My Evolving Web Page&lt;/title&gt;\r\n            &lt;/head&gt;\r\n            &lt;body&gt;\r\n                &lt;header&gt;\r\n                    &lt;h1&gt;Welcome to My Website!&lt;/h1&gt;\r\n                &lt;/header&gt;\r\n                &lt;section&gt;\r\n                    &lt;p&gt;This is a section of my evolving content.&lt;/p&gt;\r\n                &lt;/section&gt;\r\n                &lt;footer&gt;\r\n                    &lt;p&gt;&amp;copy; 2024 My Website. All rights reserved.&lt;/p&gt;\r\n                &lt;/footer&gt;\r\n            &lt;/body&gt;\r\n            &lt;/html&gt;\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        From the introduction of semantic elements to the latest standards, HTML continues to adapt to\r\n        the demands of modern web development.\r\n    </p>\r\n\r\n    <h2>The Dynamic World of CSS:</h2>\r\n    <p>\r\n        Cascading Style Sheets (CSS) has evolved beyond basic styling. Let\'s take a look at a snippet\r\n        embracing the power of Flexbox for layout:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            body {\r\n                display: flex;\r\n                flex-direction: column;\r\n                align-items: center;\r\n                justify-content: center;\r\n                height: 100vh;\r\n                margin: 0;\r\n                font-family: \'Arial\', sans-serif;\r\n            }\r\n\r\n            header {\r\n                background-color: #3498db;\r\n                color: #fff;\r\n                padding: 1rem;\r\n                text-align: center;\r\n            }\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        Flexbox and other layout techniques have revolutionized how we create responsive and\r\n        aesthetically pleasing designs.\r\n    </p>\r\n\r\n    <h2>JavaScript\'s Evolution:</h2>\r\n    <p>\r\n        JavaScript, the dynamic scripting language, has undergone significant changes. Here\'s a\r\n        simplified example using ES6 arrow functions:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            const greet = (name) => {\r\n                return `Hello, ${name}! Welcome to the Coding Chronicles.`;\r\n            };\r\n\r\n            const userName = \'Web Developer\';\r\n            console.log(greet(userName));\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        ES6 features, like arrow functions, template literals, and destructuring, enhance code\r\n        readability and maintainability, reflecting the evolving nature of JavaScript.\r\n    </p>\r\n\r\n    <h2>Frameworks and Libraries:</h2>\r\n    <p>\r\n        The rise of frameworks and libraries has significantly impacted web development. Let\'s\r\n        explore a simple React component:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            import React from \'react\';\r\n\r\n            const MyComponent = () => {\r\n                return (\r\n                    &lt;div&gt;\r\n                        &lt;h2&gt;Hello from MyComponent!&lt;/h2&gt;\r\n                        &lt;p&gt;This is a React component in action.&lt;/p&gt;\r\n                    &lt;/div&gt;\r\n                );\r\n            };\r\n\r\n            export default MyComponent;\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        React, Angular, and Vue.js are just a few examples shaping the landscape of modern web\r\n        development.\r\n    </p>\r\n\r\n    <h2>Adapting to New Technologies:</h2>\r\n    <p>\r\n        Web development is a perpetual journey of learning. Embracing new technologies, such as\r\n        Progressive Web Apps (PWAs) or WebAssembly, ensures staying at the forefront of innovation.\r\n    </p>\r\n\r\n    <p>\r\n        As we navigate this ever-evolving landscape, the Coding Chronicles continue to document the\r\n        progress, challenges, and triumphs of web development. Stay tuned for more chapters in this\r\n        exciting coding saga!\r\n    </p>', 3, '2021-12-22 14:03:04'),
(4, 'Beyond the Basics: Unlocking the Power of Advanced JavaScript Techniques', 'Closures in JavaScript are a powerful concept.', '<h2>Mastering Closures:</h2>\r\n    <p>\r\n        Closures in JavaScript are a powerful concept. Let\'s delve into an example to understand their\r\n        potential:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            function outerFunction() {\r\n                const outerVariable = \'I am outside!\';\r\n\r\n                function innerFunction() {\r\n                    console.log(outerVariable);\r\n                }\r\n\r\n                return innerFunction;\r\n            }\r\n\r\n            const closureExample = outerFunction();\r\n            closureExample(); // Output: I am outside!\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        Closures allow inner functions to access variables from their outer functions even after the\r\n        outer function has finished executing.\r\n    </p>\r\n\r\n    <h2>Functional Programming Paradigm:</h2>\r\n    <p>\r\n        Embracing functional programming principles can lead to more concise and maintainable code.\r\n        Consider the following example using the `map` and `filter` functions:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            const numbers = [1, 2, 3, 4, 5];\r\n\r\n            const squaredEvenNumbers = numbers\r\n                .filter(num => num % 2 === 0)\r\n                .map(num => num ** 2);\r\n\r\n            console.log(squaredEvenNumbers); // Output: [4, 16]\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        Functional programming promotes the use of pure functions and avoids mutable data, leading\r\n        to more predictable and scalable code.\r\n    </p>\r\n\r\n    <h2>Asynchronous JavaScript with Promises:</h2>\r\n    <p>\r\n        Managing asynchronous operations becomes more elegant with promises. Let\'s look at a simple\r\n        example of fetching data:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            function fetchData() {\r\n                return new Promise((resolve, reject) => {\r\n                    // Simulating an asynchronous API call\r\n                    setTimeout(() => {\r\n                        const data = \'Fetched data!\';\r\n                        resolve(data);\r\n                    }, 2000);\r\n                });\r\n            }\r\n\r\n            fetchData()\r\n                .then(data => console.log(data)) // Output: Fetched data!\r\n                .catch(error => console.error(error));\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        Promises simplify handling asynchronous code, providing a more structured and readable\r\n        approach.\r\n    </p>\r\n\r\n    <h2>ES6+ Destructuring and Spread:</h2>\r\n    <p>\r\n        Destructuring and spread syntax bring elegance to variable assignment and array/object\r\n        manipulation. Here\'s an example using destructuring and spread in function parameters:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            function mergeArrays(...arrays) {\r\n                return [].concat(...arrays);\r\n            }\r\n\r\n            const arr1 = [1, 2, 3];\r\n            const arr2 = [4, 5, 6];\r\n            const mergedArray = mergeArrays(arr1, arr2);\r\n\r\n            console.log(mergedArray); // Output: [1, 2, 3, 4, 5, 6]\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        Destructuring simplifies variable assignment, and spread syntax simplifies array\r\n        concatenation and object merging.\r\n    </p>\r\n\r\n    <h2>Proxies and Metaprogramming:</h2>\r\n    <p>\r\n        JavaScript\'s `Proxy` object enables metaprogramming, allowing you to intercept and customize\r\n        fundamental operations. Consider this simple logging example:\r\n    </p>\r\n\r\n    <pre>\r\n        <code>\r\n            const targetObject = {\r\n                message: \'Hello, Proxies!\',\r\n            };\r\n\r\n            const loggingHandler = {\r\n                get: function(target, property) {\r\n                    console.log(`Accessed property: ${property}`);\r\n                    return target[property];\r\n                },\r\n            };\r\n\r\n            const proxiedObject = new Proxy(targetObject, loggingHandler);\r\n\r\n            console.log(proxiedObject.message); // Output: Accessed property: message \\n Hello, Proxies!\r\n        </code>\r\n    </pre>\r\n\r\n    <p>\r\n        Proxies open up possibilities for advanced customization of object behavior, making\r\n        metaprogramming a reality in JavaScript.\r\n    </p>\r\n\r\n    <p>\r\n        As you venture beyond the basics, these advanced JavaScript techniques empower you to write\r\n        more expressive, modular, and efficient code. Embrace the power they offer, and elevate your\r\n        JavaScript skills to new heights!\r\n    </p>', 4, '2020-05-14 11:06:44'),
(5, 'Inclusive Design 101: Crafting Digital Spaces for All Abilities', 'In the realm of web design, creating inclusive digital', '<p>\r\n        In the realm of web design, creating inclusive digital spaces is not just a trend; it\'s a\r\n        responsibility. Inclusive design goes beyond aesthetics, focusing on accessibility and\r\n        usability for users of all abilities. Let\'s explore key principles and resources to\r\n        champion inclusivity in your digital projects.\r\n    </p>\r\n\r\n    <h2>The Foundation of Inclusive Design:</h2>\r\n    <p>\r\n        At its core, inclusive design prioritizes equal access and a seamless user experience for\r\n        everyone. It begins with understanding diverse user needs and tailoring digital\r\n        environments to accommodate various abilities. To delve deeper into this foundation, check\r\n        out articles like <a href=\'https://www.invisionapp.com/inside-design/principles-of-inclusive-design/\' target=\'_blank\'> \'The Principles of Inclusive Design\' </a>.\r\n    </p>\r\n\r\n    <h2>Accessible Color Palettes and Contrast:</h2>\r\n    <p>\r\n        Color plays a crucial role in design, but it can pose challenges for individuals with\r\n        visual impairments. Learn how to create accessible color palettes and ensure sufficient\r\n        contrast ratios. For insights, read <a href=\'https://www.smashingmagazine.com/2016/04/web-developer-guide-color/\' target=\'_blank\'> \'Color in Design Systems\' </a> and <a href=\'https://webdesign.tutsplus.com/tutorials/how-to-choose-accessible-colors--cms-31756\' target=\'_blank\'> \'Choosing Accessible Color\' </a>.\r\n    </p>\r\n\r\n    <h2>Typography for Readability:</h2>\r\n    <p>\r\n        Typography is more than font choice; it\'s about enhancing readability for everyone. Explore\r\n        techniques to improve text legibility, such as proper font sizes and line spacing. <a href=\'https://alistapart.com/article/on-web-typography/\' target=\'_blank\'> \'Web Typography: Designing Tables to be Read, Not Looked At\' </a> is a valuable resource for refining your typography skills.\r\n    </p>\r\n\r\n    <h2>Responsive Design and Flexibility:</h2>\r\n    <p>\r\n        Embrace responsive design principles to ensure your digital space adapts to various screen\r\n        sizes and devices. This promotes a seamless experience for users with diverse\r\n        accessibility requirements. Dive into <a href=\'https://alistapart.com/article/responsive-web-design/\' target=\'_blank\'> \'The Art of Responsive Design\' </a> for practical insights.\r\n    </p>\r\n\r\n    <h2>Screen Reader Compatibility:</h2>\r\n    <p>\r\n        Screen readers are vital tools for users with visual impairments. Ensure your digital\r\n        content is compatible by incorporating proper HTML semantics and ARIA roles. Learn from <a href=\'https://webaim.org/techniques/screenreader/\' target=\'_blank\'> \'Creating Accessible Websites\' </a> to make your projects screen reader-friendly.\r\n    </p>\r\n\r\n    <h2>Keyboard Navigation Mastery:</h2>\r\n    <p>\r\n        Not all users interact with a mouse, making keyboard navigation crucial. Optimize your\r\n        designs for easy navigation using only a keyboard. <a href=\'https://www.smashingmagazine.com/2009/07/10-useful-usability-findings-and-guidelines/\' target=\'_blank\'> \'The Dos and Don\'ts of Designing for Accessibility\' </a> provides actionable advice in this regard.\r\n    </p>\r\n\r\n    <h2>Inclusive Imagery and Alt Text:</h2>\r\n    <p>\r\n        Images should convey meaning to all users, including those using screen readers. Implement\r\n        descriptive alt text and consider inclusive imagery. Discover more about alt text best\r\n        practices in <a href=\'https://webaim.org/techniques/alttext/\' target=\'_blank\'> \'Writing Effective Alt Text\' </a>.\r\n    </p>\r\n\r\n    <h2>Continuous Learning and Community:</h2>\r\n    <p>\r\n        The field of inclusive design is ever-evolving. Stay informed and engaged with the vibrant\r\n        accessibility community. Connect with others, attend conferences, and participate in\r\n        discussions. Explore articles like <a href=\'https://www.smashingmagazine.com/2019/03/accessibility-conferences/\' target=\'_blank\'> \'Accessibility Events and Conferences\' </a> to find opportunities for continuous learning.\r\n    </p>\r\n\r\n    <p>\r\n        In conclusion, inclusive design is a journey of empathy and creativity. By adopting these\r\n        principles and delving into the recommended articles, you\'ll be better equipped to create\r\n        digital spaces that welcome and serve users of all abilities.\r\n    </p>', 1, '2019-07-13 16:06:44'),
(6, 'Beyond Compliance: Elevating Your Website\'s Accessibility Game', 'Creating an accessible website goes beyond meeting minimum compliance standards', '<p>\r\n        Creating an accessible website goes beyond meeting minimum compliance standards. Elevating\r\n        your website\'s accessibility game involves a commitment to inclusivity and user-centric\r\n        design. Let\'s explore strategies and resources to take your website\'s accessibility to the\r\n        next level.\r\n    </p>\r\n\r\n    <h2>Understanding Diverse User Needs:</h2>\r\n    <p>\r\n        Accessibility begins with empathy. To create a truly inclusive website, understand the\r\n        diverse needs of your users. Check out resources like <a href=\'https://www.w3.org/WAI/test-evaluate/\' target=\'_blank\'> \'Evaluation and Testing Tools\' </a> from W3C to ensure your website meets a wide range of accessibility criteria.\r\n    </p>\r\n\r\n    <h2>Designing for All Abilities:</h2>\r\n    <p>\r\n        Move beyond basic compliance by designing for all abilities from the start. Consider\r\n        incorporating inclusive design principles such as clear navigation, consistent layouts, and\r\n        adaptable color schemes. <a href=\'https://www.a11yproject.com/\' target=\'_blank\'> \'The A11Y Project\' </a> provides a wealth of information on creating universally accessible designs.\r\n    </p>\r\n\r\n    <h2>Enhancing Navigation and User Flow:</h2>\r\n    <p>\r\n        Navigation is a critical aspect of website accessibility. Enhance user flow by providing\r\n        clear headings, intuitive menus, and skip navigation options. Learn more about accessible\r\n        navigation techniques from <a href=\'https://webaim.org/techniques/keyboard/\' target=\'_blank\'> \'Keyboard Accessibility\' </a>.\r\n    </p>\r\n\r\n    <h2>Implementing ARIA Roles Effectively:</h2>\r\n    <p>\r\n        Accessible Rich Internet Applications (ARIA) roles can significantly enhance the\r\n        accessibility of dynamic content. However, using them effectively is crucial. Dive into the\r\n        <a href=\'https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA\' target=\'_blank\'> \'ARIA Developer Guide\' </a> on MDN Web Docs to understand how to implement ARIA roles in a meaningful way.\r\n    </p>\r\n\r\n    <h2>Testing with Real Users:</h2>\r\n    <p>\r\n        While automated testing is valuable, nothing beats real user feedback. Conduct usability\r\n        testing with individuals who have diverse abilities. Platforms like <a href=\'https://usabilityhub.com/\' target=\'_blank\'> \'UsabilityHub\' </a> offer tools for remote user testing, allowing you to gather valuable insights.\r\n    </p>\r\n\r\n    <h2>Providing Alternative Content:</h2>\r\n    <p>\r\n        Beyond compliance, strive to provide alternative content for various types of media. Ensure\r\n        images have descriptive alt text, videos have captions, and documents are accessible.\r\n        Explore the <a href=\'https://www.w3.org/WAI/test-evaluate/\' target=\'_blank\'> \'W3C Web Accessibility Initiative\' </a> for comprehensive guidelines on creating alternative content.\r\n    </p>\r\n\r\n    <h2>Staying Informed on Emerging Standards:</h2>\r\n    <p>\r\n        Web accessibility standards evolve. Stay informed on the latest developments and emerging\r\n        standards. Follow organizations like the <a href=\'https://www.w3.org/WAI/\' target=\'_blank\'> \'W3C Web Accessibility Initiative\' </a> for updates and participate in the community to stay ahead of the curve.\r\n    </p>\r\n\r\n    <p>\r\n        In conclusion, going beyond compliance in web accessibility is about embracing a mindset of\r\n        continuous improvement. By understanding user needs, implementing inclusive design, and\r\n        staying informed on emerging standards, you can elevate your website\'s accessibility game\r\n        and create a truly inclusive online experience.\r\n    </p>', 3, '2023-10-04 10:06:44');

-- --------------------------------------------------------

--
-- Structure de la table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts_categories`
--

INSERT INTO `posts_categories` (`post_id`, `category_id`) VALUES
(6, 3),
(5, 2),
(5, 3),
(2, 2),
(1, 2),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Test', 'test@test.fr', '$2y$10$MXdJStM/YX9vJDjgD67l6.gNuJpzKs2/9x6nD4p54SRfNQpjv32jq', 'USER', '2016-01-07 13:53:51'),
(2, 'Admin', 'admin@test.fr', '$2y$10$cy4evTNdUAkjwIb8u6MyreJSpNmzVE1LNShHd0JhLcRkFKgXPxx0W', 'ADMIN', '2024-01-26 18:15:35'),
(3, 'User', 'user@test.fr', '$2y$10$txzUzh73e9SKOjJ496JYTuUsHnoSWOdS02KFEORF40eUoZ0vWWcHG', 'USER', '2024-01-26 23:06:35'),
(4, 'Secure', 'secure@test.fr', '$2y$10$UvgzpYt9eZWhrxoPmUFEauH3Juts9HxZA8VRxwDeo1g2vL2gK3CVa', 'ADMIN', '2024-01-26 02:15:34');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Index pour la table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD KEY `category_id` (`category_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD CONSTRAINT `posts_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_categories_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
