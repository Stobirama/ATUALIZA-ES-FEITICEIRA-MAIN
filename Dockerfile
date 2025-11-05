# Imagem base do PHP com servidor embutido
FROM php:8.2-cli

# Copia todos os arquivos pro container
COPY . /app
WORKDIR /app

# Exposição da porta
EXPOSE 8080

# Comando pra iniciar o servidor PHP
CMD ["php", "-S", "0.0.0.0:8080"]