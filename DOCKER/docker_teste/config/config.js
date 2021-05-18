modulo.exports = {
    development: {
        database: {
            host: "localhost",
            port: 25432,
            name: "grp3_050121",
            dialect: "postgres",
            user: "postgres",
            password: "postgres"
       }
    },
    production: {
        database: {
            host: process.env.DB_HOST,
            port: process.env.DB_PORT
        }
    }
};
