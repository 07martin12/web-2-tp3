# API de Notas

Esta API proporciona endpoints para gestionar notas, libretas y usuarios en un sistema de gestión de notas.

## Desarrollador(solo)

- **Nombre**: Martín Lorenzi  
- **Email**: [alexmartin9c@gmail.com](mailto:alexmartin9c@gmail.com)

## Documentación de Endpoints

### 1. Obtener Lista de Notas
- **Endpoint**: `/notas/:user`
- **Método**: `GET`
- **Uso**: `http://ubicacionDelArchivo/notas/usuario1`
  
**Ejemplo de Respuesta (JSON)**:

```json
[
  {
    "id_nota": 1,
    "titulo": "Nota 1",
    "contenido": "Contenido de la nota 1",
    "fecha_creacion": "2023-01-01"
  },
  {
    "id_nota": 2,
    "titulo": "Nota 2",
    "contenido": "Contenido de la nota 2",
    "fecha_creacion": "2023-02-01"
  }
]
```

### 2. Obtener Nota por ID
- **Endpoint**: `/notas/:user/:idNote`
- **Método**: `GET`
- **Uso**: `http://ubicacionDelArchivo/notas/usuario1/1`

**Ejemplo de Respuesta (JSON)**:

```json
{
  "id_nota": 1,
  "titulo": "Nota 1",
  "contenido": "Contenido de la nota 1",
  "fecha_creacion": "2023-01-01"
}
```

### 3. Añadir Nueva Nota
- **Endpoint**: `/notas/:user/:idNotebook`
- **Método**: `POST`
- **Uso**: `http://ubicacionDelArchivo/notas/usuario1/1`

**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "titulo": "Nueva Nota",
  "contenido": "Contenido de la nueva nota"
}
```

### 4. Actualizar Nota por ID
- **Endpoint**: `/notas/:user/:idNotebook/:idNote`
- **Método**: `PUT`
- **Uso**: `http://ubicacionDelArchivo/notas/usuario1/1/1`

**Ejemplo de Respuesta (JSON)**:

```json
{
  "titulo": "Nota Actualizada",
  "contenido": "Contenido de la nota actualizada"
}
```

### 5. Eliminar Nota por ID
- **Endpoint**: `/notas/:user/:idNotebook/:idNote`
- **Método**: `DELETE`
- **Uso**: `http://ubicacionDelArchivo/notas/usuario1/1/1`

**Ejemplo de Respuesta (JSON)**:

```json
{
  "token": "JWT_TOKEN"
}
```

### 6. Obtener Lista de Libretas
- **Endpoint**: `/libretas/:user`
- **Método**: `GET`
- **Uso**: `http://ubicacionDelArchivo/libretas/usuario1`

**Ejemplo de Respuesta (JSON)**:

```json
[
  {
    "id_libreta": 1,
    "nombre": "Mi Libreta 1"
  },
  {
    "id_libreta": 2,
    "nombre": "Mi Libreta 2"
  }
]
```

### 7. Obtener Libreta por ID
- **Endpoint**: `/libretas/:user/:idNotebook`
- **Método**: `GET`
- **Uso**: `http://ubicacionDelArchivo/libretas/usuario1/1`

**Ejemplo de Respuesta (JSON)**:

```json
{
  "id_libreta": 1,
  "nombre": "Mi Libreta 1"
}
```

### 8. Añadir Nueva Libreta
- **Endpoint**: `/libretas/:user`
- **Método**: `POST`
- **Uso**: `http://ubicacionDelArchivo/libretas/usuario1`

**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "nombre": "Nueva Libreta"
}
```

### 9. Actualizar Libreta por ID
- **Endpoint**: `/libretas/:user/:idNotebook`
- **Método**: `PUT`
- **Uso**: `http://ubicacionDelArchivo/libretas/usuario1/1`


**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "nombre": "Mi Libreta Actualizada"
}
```

### 10. Eliminar Libreta por ID
- **Endpoint**: `/libretas/:user/:idNotebook`
- **Método**: `DELETE`
- **Uso**: `http://ubicacionDelArchivo/libretas/usuario1/1`

**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "token": "JWT_TOKEN"
}
```

### 11. Crear Usuario
- **Endpoint**: `/usuarios`
- **Método**: `POST`
- **Uso**: `http://ubicacionDelArchivo/usuarios`

**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "nombre": "Usuario1",
  "email": "usuario1@example.com",
  "password": "1234"
}
```

### 12. Actualizar Usuario por ID
- **Endpoint**: `/usuarios/:id`
- **Método**: `PUT`
- **Uso**: `http://ubicacionDelArchivo/usuarios/1`


**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "nombre": "Nuevo Nombre",
  "email": "nuevoemail@example.com"
}
```

### 13. Eliminar Usuario por ID
- **Endpoint**: `/usuarios/:id`
- **Método**: `DELETE`
- **Uso**: `http://ubicacionDelArchivo/usuarios/1`

**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "token": "JWT_TOKEN"
}
```

### 14. Obtener Token para Usuario
- **Endpoint**: `/usuarios/token`
- **Método**: `GET`
- **Uso**: `http://ubicacionDelArchivo/usuarios/token`

**Ejemplo de Datos del Cuerpo (JSON)**:

```json
{
  "token": "JWT_TOKEN"
}
```

## Información Adicional

### Paginación de Notas

* Endpoint: GET /notas/paginar/:PAGINA/:LIMITE
* Descripción: Este endpoint proporciona la funcionalidad de paginación para obtener una página específica de notas con el número de resultados especificado.

- Ejemplo de Uso: GET http://ubicacionDelArchivo/notas/paginar/1/10

**Ejemplo de Respuesta (JSON)**:

```json
[
  {
    "id_nota": 1,
    "titulo": "Nota 1",
    "contenido": "Contenido de la nota 1"
  },
  {
    "id_nota": 2,
    "titulo": "Nota 2",
    "contenido": "Contenido de la nota 2"
  }
]
```

## Uso de la API en Postman

### Autenticación

- Método de Autenticación: Basic Auth

En Postman, para autenticarte, se debe incluir las siguientes credenciales:

**Username**: administrador
**Password**: adminPax

### Instrucciones para Postman: 

- Seleccionar el tipo de autenticación como Basic Auth.
- Introducir el Username y Password.
- Realiza las peticiones a los diferentes endpoints de la API.

