//import puppeteer from "puppeteer";
const puppeteer = require("puppeteer");
const fs = require("fs").promises;

// JSON data reader function
const readJSON = async () => {
    const data = await fs.readFile("json-data/data.json", "utf8");
    return JSON.parse(data);
};

// Delaying function
function delay(time) {
    return new Promise(function (resolve) {
        setTimeout(resolve, time);
    });
}

(async () => {
    // Config variables
    const browser = await puppeteer.launch({ headless: false });
    const page = await browser.newPage();

    // URL to scrape
    await page.goto("http://127.0.0.1:8000/");

    // It goes to Login section
    await page.click(
        '[class="sm:fixed sm:top-0 sm:right-0 p-6 text-right"]>a:first-of-type'
    );

    // Waiting & Taking a screenshot
    await page.waitForSelector('input[id="email"]', { visible: true }).then(
        page.screenshot({
            path: "./screenshots/loginImage.jpeg",
            type: "jpeg",
        })
    );
    //Login
    await page.type('input[id="email"]', "dave88@mymail.com"); // Email typing
    await page.type('input[id="password"]', "Dave1988"); //Password typing
    await page.click('button[type="submit"]');

    // Sample screenshot
    await page.screenshot({
        path: "./screenshots/screenshots.jpeg",
        type: "jpeg",
    });

    // Waiting for selector
    await page.waitForSelector("iframe", {
        visible: true,
    });

    // Iframe set-up
    let iframe = await page.$("iframe");
    let iframeDocument = await iframe.contentFrame();

    // variable to access JSON properties
    const formData = await readJSON();

    // Form scraping
    await iframeDocument.type('input[id="email"]', formData.email); // Email typing
    await iframeDocument.type('[id="clave"]', formData.password); // typing password
    await iframeDocument.type(
        '[id="confirmarClave"]',
        formData.confirmation_password
    ); // typing confirming password
    await iframeDocument.type('[id="name"]', formData.first_name); // typing name
    await iframeDocument.type('[id="lastName"]', formData.last_name); // typing last name
    await iframeDocument.type('[id="company"]', formData.company); // typing company name
    await iframeDocument.type('[id="phone"]', formData.phone_number); // typing phone
    await iframeDocument.select(
        'select[class="form-group"]',
        formData.security_question
    ); // selecting security answer

    // Sample screenshot
    await page.screenshot({
        path: "./screenshots/formData.jpeg",
        type: "jpeg",
    });

    // Generating PDF
    await iframeDocument.click('button[class="submit-button"]');
    await delay(25000);

    // Closing session
    await browser.close();
})();
