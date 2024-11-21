### **Explicación de las Tablas**

#### **roles**
Define los roles disponibles en el sistema. En este caso, se incluyen dos roles:
- **id**: Identificador único del rol.
- **nombre**: Nombre del rol (por ejemplo: "Cliente", "Administrador").

#### **clientes**
Almacena información sobre los clientes que usan la aplicación. Incluye:
- **id**: Identificador único del cliente.
- **nombre**: Nombre completo del cliente.
- **email**: Correo electrónico del cliente (único).
- **google_id**: ID único de Google para la autenticación.
- **fecha_registro**: Fecha y hora en la que se registró el cliente.

#### **paquetes**
Contiene los detalles de los paquetes turísticos que ofrece la agencia. Incluye:
- **id**: Identificador único del paquete.
- **nombre**: Nombre del paquete turístico.
- **descripcion**: Descripción detallada del paquete.
- **precio**: Costo del paquete turístico.
- **disponibilidad**: Número de plazas disponibles para el paquete.
- **ubicacion**: Ubicación del paquete (solo Panamá).
- **fecha_inicio**: Fecha de inicio del paquete.
- **fecha_fin**: Fecha de finalización del paquete.
- **imagen_url**: URL de la imagen representativa del paquete turístico.

#### **reservas**
Registra las reservas realizadas por los clientes para un paquete turístico. Incluye:
- **id**: Identificador único de la reserva.
- **cliente_id**: Referencia al cliente que realizó la reserva (clave foránea de la tabla **clientes**).
- **paquete_id**: Referencia al paquete turístico reservado (clave foránea de la tabla **paquetes**).
- **fecha_reserva**: Fecha y hora en que se realizó la reserva.
- **estado**: Estado de la reserva (por ejemplo: 'Confirmado', 'Pendiente', 'Cancelado').

#### **usuarios**
Asocia a los clientes con sus roles dentro del sistema. Un cliente puede tener un rol específico (por ejemplo, Cliente o Administrador). Incluye:
- **id**: Identificador único del usuario.
- **cliente_id**: Referencia al cliente (clave foránea de la tabla **clientes**).
- **rol_id**: Referencia al rol del usuario (clave foránea de la tabla **roles**).

#### **auditoria** (opcional)
Registra acciones importantes realizadas por los administradores o clientes. Esta tabla puede ser útil para realizar un seguimiento de los cambios en paquetes, reservas, etc. Incluye:
- **id**: Identificador único de la acción registrada.
- **usuario_id**: Referencia al usuario que realizó la acción (clave foránea de la tabla **usuarios**).
- **accion**: Descripción de la acción realizada (por ejemplo: "Reserva confirmada", "Paquete modificado").
- **fecha**: Fecha y hora en que se realizó la acción.

#### **Índices**
Se crean índices para optimizar el rendimiento de las consultas más frecuentes. Estos índices incluyen:
- **idx_email**: Índice en el campo **email** de la tabla **clientes**.
- **idx_google_id**: Índice en el campo **google_id** de la tabla **clientes**.
- **idx_cliente_id**: Índice en el campo **cliente_id** de la tabla **reservas**.
- **idx_paquete_id**: Índice en el campo **paquete_id** de la tabla **reservas**.
