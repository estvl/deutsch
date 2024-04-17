# Use an official Node.js runtime as the base image
FROM node:latest

# Set the working directory in the container
WORKDIR /usr/src/app


# Copy package.json and package-lock.json to the working directory
COPY package*.json ./

# Copy the rest of the application code to the working directory
COPY . .


# Install dependencies
RUN npm install -g http-server

# Expose port 80 to the outside world
EXPOSE 80

# Command to run your application
CMD ["http-server", "-p", "80"]