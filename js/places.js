const jordanDestinations = [
    // Adventure & Eco
    {
        id: 1,
        name: "Jordan Trail",
        categoryId: "adventure-eco",
        categoryName: "Adventure & Eco",
        location: "Country-wide",
        description: `The Jordan Trail is a ~675km long-distance hiking route traversing Jordan from Um Qais in the north to Aqaba on the Red Sea in the south. Completed in roughly 35–40 days, the trail crosses diverse landscapes—including northern forests, rugged wadis, Petra, and Wadi Rum—while passing through 75 villages to showcase local culture, cuisine, and history.`,
        tags: ["hiking", "nature", "outdoor"],
        rating: 4.8,
        tripDuration: "35-40 days (full trail)",
        fee: "Free (unguided)",
        contactNumber: "+962 6 461 3234",
        images: [
            "assets/images/jordan-trail-1.jpeg",
            "assets/images/jordan-trail-2.jpeg",
            "assets/images/jordan-trail-3.jpeg",
            "assets/images/jordan-trail-4.jpeg",
        ]
    },
    {
        id: 2,
        name: "JBW Jordan Birdwatch",
        categoryId: "adventure-eco",
        categoryName: "Adventure & Eco",
        location: "Various Locations",
        description: `Jordan BirdWatch (JBW) is a registered Jordanian association dedicated to protecting wild birds and their habitats through science-based conservation, monitoring, and awareness. Founded by ornithologists and conservationists, JBW promotes eco-tourism, conducts field research, provides capacity building for guides, and works with local communities to conserve bird populations.`,
        tags: ["wildlife", "conservation", "eco-tourism"],
        rating: 4.5,
        tripDuration: "Half-day to multi-day tours",
        fee: "Varies by tour package",
        contactNumber: "+962 7 9123 4567",
        images: [
            "assets/images/jbw-1.jpeg",
            "assets/images/jbw-2.jpeg",
            "assets/images/jbw-3.jpeg",
            "assets/images/jbw-4.jpeg",
        ]
    },

    // History & Culture
    {
        id: 3,
        name: "Petra",
        categoryId: "history-culture",
        categoryName: "History & Culture",
        location: "Ma'an Governorate",
        description: `Petra is a renowned UNESCO World Heritage site and "New Seven Wonders of the World" location in southern Jordan. Founded over 2,000 years ago by the Nabataeans, it is a magnificent desert city carved directly into vibrant rose-red sandstone cliffs, showcasing Hellenistic architecture like the Treasury (Al-Khazneh) and ancient water management systems.`,
        tags: ["archaeology", "unesco", "nabataean"],
        rating: 4.9,
        tripDuration: "1 to 3 days",
        fee: "50 JOD (1-day pass)",
        contactNumber: "+962 3 215 6060",
        images: [
            "assets/images/petra-1.jpeg",
            "assets/images/petra-2.jpeg",
            "assets/images/petra-3.jpeg",
            "assets/images/petra-4.jpeg",
        ]
    },
    {
        id: 4,
        name: "Jerash",
        categoryId: "history-culture",
        categoryName: "History & Culture",
        location: "Jerash Governorate",
        description: `Jerash, located 30 miles north of Amman, houses one of the world's best-preserved Roman provincial cities. Known as "Pompeii of the East," the ruins feature a colonnaded Oval Plaza, two massive theaters, the Temple of Artemis, and the 800m-long Cardo Maximus, all buried by sand for centuries.`,
        tags: ["roman ruins", "ancient city", "architecture"],
        rating: 4.7,
        tripDuration: "3 to 4 hours",
        fee: "10 JOD",
        contactNumber: "+962 2 634 1234",
        images: [
            "assets/images/jerash-1.jpeg",
            "assets/images/jerash-2.jpeg",
            "assets/images/jerash-3.jpeg",
            "assets/images/jerash-4.jpeg",
        ]
    },

    // Leisure & Wellness
    {
        id: 5,
        name: "Dead Sea",
        categoryId: "leisure-wellness",
        categoryName: "Leisure & Wellness",
        location: "Jordan Rift Valley",
        description: `The Dead Sea is a hypersaline lake bordered by Jordan and Israel, renowned as the lowest point on Earth (over 400m below sea level). Known for its extreme salinity—roughly 10 times saltier than the ocean—it allows for effortless floating and features therapeutic mineral-rich mud. Its waterless, barren landscape attracts tourists for wellness tourism and health benefits.`,
        tags: ["spa", "relaxation", "lowest point"],
        rating: 4.6,
        tripDuration: "Half-day to 1 day",
        fee: "Free (public) to 20+ JOD (resort access)",
        contactNumber: "+962 5 356 1234",
        images: [
            "assets/images/dead-sea-1.jpeg",
            "assets/images/dead-sea-2.jpeg",
            "assets/images/dead-sea-3.jpeg",
            "assets/images/dead-sea-4.jpeg",
        ]
    },
    {
        id: 6,
        name: "Ma'in Hot Springs (Hammamat Ma'in)",
        categoryId: "leisure-wellness",
        categoryName: "Leisure & Wellness",
        location: "Madaba Governorate",
        description: `Ma'in Hot Springs (Hammamat Ma'in) are natural thermal mineral waterfalls and springs located in Jordan, 264 meters below sea level near the Dead Sea. Renowned since Roman times, these hot, therapeutic waters (up to 63°C) cascade down cliffs, offering a premier spa and wellness destination.`,
        tags: ["hot springs", "resort", "waterfalls"],
        rating: 4.4,
        tripDuration: "2 to 4 hours",
        fee: "15 JOD",
        contactNumber: "+962 5 325 2000",
        images: [
            "assets/images/ma'in-1.jpeg",
            "assets/images/ma'in-2.jpeg",
            "assets/images/ma'in-3.jpeg",
            "assets/images/ma'in-4.jpeg",
        ]
    },

    // Religious & Faith
    {
        id: 7,
        name: "The Cave of the Seven Sleepers (Ahl Al-Kahf)",
        categoryId: "religious-faith",
        categoryName: "Religious & Faith",
        location: "Amman",
        description: `The Cave of the Seven Sleepers is a religious and historical site, prominently located near Amman, Jordan (Al-Rajib) and Ephesus, Turkey, associated with a miraculous tale in both Islamic (Surat al-Kahf) and Christian traditions. It tells of young men who slept in a cave for over 300 years to escape persecution.`,
        tags: ["islamic history", "shrine", "cave"],
        rating: 4.5,
        tripDuration: "1 to 2 hours",
        fee: "Free (donations accepted)",
        contactNumber: "+962 6 478 1234",
        images: [
            "assets/images/cave-of-the-seven-sleepers-1.jpeg",
            "assets/images/cave-of-the-seven-sleepers-2.jpeg",
            "assets/images/cave-of-the-seven-sleepers-3.jpeg",
            "assets/images/cave-of-the-seven-sleepers-4.jpeg",
        ]
    },
    {
        id: 8,
        name: "Jordan River / Al-Maghtas",
        categoryId: "religious-faith",
        categoryName: "Religious & Faith",
        location: "Balqa Governorate",
        description: `The Jordan River is a 251-kilometer-long (156-mile) river in the Middle East flowing south from Mount Hermon through the Sea of Galilee to the Dead Sea, forming a major, low-elevation geopolitical boundary. As the world's lowest river, it is a vital, historically significant water source for Israel, Jordan, and Palestine, deeply sacred to Christians, Jews, and Muslims.`,
        tags: ["christianity", "baptism site", "unesco"],
        rating: 4.8,
        tripDuration: "2 to 3 hours",
        fee: "12 JOD",
        contactNumber: "+962 5 359 0000",
        images: [
            "assets/images/jordan-river-1.jpeg",
            "assets/images/jordan-river-2.jpeg",
            "assets/images/jordan-river-3.jpeg",
            "assets/images/jordan-river-4.jpeg",
        ]
    }
];


function card(props) {
    return `
    <div class="card">
        <h3 class="place-name">${props.name}</h3>
        <img src="${props.images[0]}" alt="${props.name}" ">
        <div class="place-info">
            <span class="category">${props.categoryName}</span> 
            <span class="rating">${props.rating} ⭐</span>
        </div>
    
        <p>${props.description}</p>
        <a href="place-details.html?id=${props.id}">view details</a>
        

      
    </div>`;
}


const cardsContainer = document.querySelector(".cards-container");

// Using a for...of loop is cleaner for arrays!
for (let destination of jordanDestinations) {
    // We add the HTML string to the container's innerHTML
    cardsContainer.innerHTML += card(destination);
}