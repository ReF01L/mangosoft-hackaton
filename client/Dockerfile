FROM node:alpine

WORKDIR /srv/client

COPY ./package*.json ./

RUN npm install

COPY ./ ./

RUN npm run build

ENV HOST 0.0.0.0

EXPOSE 3000

CMD [ "npm", "run", "dev" ]
