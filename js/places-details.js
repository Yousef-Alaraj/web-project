const querystring = window.location.search;
const urlParams = new URLSearchParams(querystring);
const jordanDestinations = [
  // Adventure & Eco
  {
    id: 1,
    name: "Jordan Trail",
    categoryId: "adventure-eco",
    categoryName: "Adventure & Eco",
    location: "Country-wide",
    description: "The Jordan Trail is a ~675km long-distance hiking route traversing Jordan from Um Qais in the, "
                    + "north to Aqaba on the Red Sea in the south.Completed in roughly 35–40 days, the trail crosses "
                    + "diverse landscapes—including northern forests, rugged wadis, Petra, and Wadi Rum—while passing "
                    + "through 75 villages to showcase local culture, cuisine, and history.",
    tags: ["hiking", "nature", "outdoor"],
  },
  {
    id: 2,
    name: "JBW Jordan Birdwatch",
    categoryId: "adventure-eco",
    categoryName: "Adventure & Eco",
    location: "Various Locations",
    description: "An initiative dedicated to bird watching, conservation, and eco-tourism across Jordan's diverse habitats.",
    tags: ["wildlife", "conservation", "eco-tourism"],
  },

  // History & Culture
  {
    id: 3,
    name: "Petra",
    categoryId: "history-culture",
    categoryName: "History & Culture",
    location: "Ma'an Governorate",
    description: "The ancient Nabataean city carved into red desert cliffs, famously known as the Rose City.",
    tags: ["archaeology", "unesco", "nabataean"],
  },
  {
    id: 4,
    name: "Jerash",
    categoryId: "history-culture",
    categoryName: "History & Culture",
    location: "Jerash Governorate",
    description: "Home to some of the best-preserved Greco-Roman ruins in the Middle East.",
    tags: ["roman ruins", "ancient city", "architecture"],
  },

  // Leisure & Wellness
  {
    id: 5,
    name: "Dead Sea",
    categoryId: "leisure-wellness",
    categoryName: "Leisure & Wellness",
    location: "Jordan Rift Valley",
    description: "The lowest point on earth, famous for its hyper-saline water and mineral-rich therapeutic mud.",
    tags: ["spa", "relaxation", "lowest point"],
  },
  {
    id: 6,
    name: "Ma'in Hot Springs (Hammamat Ma'in)",
    categoryId: "leisure-wellness",
    categoryName: "Leisure & Wellness",
    location: "Madaba Governorate",
    description: "A series of natural thermal waterfalls and hot springs located between Madaba and the Dead Sea.",
    tags: ["hot springs", "resort", "waterfalls"],
  },

  // Religious & Faith
  {
    id: 7,
    name: "The Cave of the Seven Sleepers (Ahl Al-Kahf)",
    categoryId: "religious-faith",
    categoryName: "Religious & Faith",
    location: "Amman",
    description: "A historical and religious site referenced in the Quran, believed to be the cave where the seven sleepers rested.",
    tags: ["islamic history", "shrine", "cave"],
  },
  {
    id: 8,
    name: "Jordan River / Al-Maghtas",
    categoryId: "religious-faith",
    categoryName: "Religious & Faith",
    location: "Balqa Governorate",
    description: "The officially recognized site of the baptism of Jesus by John the Baptist.",
    tags: ["christianity", "baptism site", "unesco"],
  }
];
