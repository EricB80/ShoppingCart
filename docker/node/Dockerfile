FROM node:10

# set working directory
WORKDIR /app

# install and cache app dependencies
COPY ./cart-frontend/package*.json /app/package.json
RUN npm install --silent

EXPOSE 3000

# start app
CMD ["npm", "start"]