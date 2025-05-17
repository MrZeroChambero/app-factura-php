# Desarrollo de un Sistema de Facturación y Control de Insumos para la Gestión Administrativa del Laboratorio Clínico HEYLIN CABRERA F.P.

## Introducción

Este proyecto se realizó con la finalidad de abordar una problemática identificada en el Laboratorio Clínico Heylin Cabrera F.P., la cual radicaba en una deficiente organización tanto en el control de insumos como en la facturación de los análisis clínicos. Esta situación generaba costos adicionales, la pérdida de registros de inventario y una notable incertidumbre que dificultaba la toma de decisiones administrativas. Asimismo, la falta de un registro concreto de las ventas ocasionaba inconvenientes al momento de la declaración de impuestos. Por consiguiente, el propósito fundamental de este proyecto fue desarrollar un sistema que permitiera optimizar estas tareas, automatizar procesos, agilizar la gestión de la información y, en última instancia, contribuir a una mejor administración de los insumos y un seguimiento más efectivo de la facturación, buscando mejorar la rentabilidad y eficiencia del laboratorio.

## Código del Proyecto

PNFIM 2-21-3887

## Autores

- Aníbal Callaspo
- Héctor González

## Tutor

Prof. Adrián González

## Objetivo del Proyecto

Desarrollar un Sistema de Facturación y Control de Insumos para la Gestión del Laboratorio Clínico HEYLIN CABRERA F.P. ubicado en Palo Negro, Estado Aragua.

## Descripción del Proyecto

Este proyecto abordó la necesidad de una mejor organización en el control de insumos y la facturación en el Laboratorio Clínico Heylin Cabrera F.P., donde los procesos manuales generaban costos adicionales, falta de registros de inventario e incertidumbre en la toma de decisiones. El sistema desarrollado tiene como objetivo optimizar las tareas administrativas a través de módulos de facturación, compras, consumo y pedidos.

## Metodología

El proyecto utilizó la metodología de Investigación-Acción Participativa (IAP) para la fase de investigación y la metodología Métrica versión 3 para la elaboración del sistema, junto con el Lenguaje Unificado de Modelado (UML) para diseñar los diagramas de cada proceso del sistema.

## Componentes y Funcionalidades del Sistema

### Registros (Servicios)

El sistema incluye módulos para gestionar diversos registros necesarios para su funcionamiento:

- Usuarios
- Análisis
- Insumos
- Proveedores
- Clientes
- Asignación de Consumos
- Asignación de Mercancía

Estos registros son esenciales para llevar a cabo los procesos principales del sistema. El sistema permite ingresar, modificar y eliminar datos a través de formularios CRUD.

### Procesos

Las funciones principales del sistema incluyen:

- Facturación: Creación de facturas por los servicios prestados a los clientes.
- Compras: Generación de órdenes de compra de insumos a los proveedores.
- Consumo: Gestión del consumo de insumos basado en los análisis realizados.
- Pedidos: Seguimiento de los insumos entrantes de las órdenes de compra.

Estos procesos buscan automatizar y agilizar las tareas administrativas del laboratorio.

### Estructura de la Aplicación

La aplicación es un sistema web local desarrollado en Visual Studio Code, utilizando PHP, HTML y CSS. Utiliza XAMPP como gestor de base de datos (MySQL) y servidor local (Apache). La interfaz del sistema está diseñada para ser amigable e intuitiva.

### Consultas e Informes (Consultas y Reportes)

El sistema proporciona varias funcionalidades de consulta e informes:

- Consulta de la información registrada (Usuarios, Análisis, Insumos, Proveedores, Clientes, Consumos Asignados, Mercancía Asignada, Facturas, Compras).
- Generación de informes en formato PDF para Facturas, Órdenes de Compra, Pedidos, Consumos y registros de Auditoría.
- Auditoría de las actividades del sistema con filtros por usuario, tipo de registro, acción y rango de fechas.

### Mantenimiento

La sección de mantenimiento incluye funcionalidades para:

- Creación de Usuarios
- Auditorías
- Cambio de IVA
- Cambio de contraseñas de usuario
- Respaldo y restauración de la base de datos

## Instalación

Se proporcionan pasos detallados de instalación en el documento de tesis, incluyendo requisitos de hardware y software. El proceso de instalación implica verificar el software necesario, instalar XAMPP, configurar la base de datos utilizando el archivo SQL proporcionado, y colocar los archivos del sistema en la carpeta htdocs.

## Pruebas

El sistema fue sometido a pruebas de desarrollador (caja negra) y pruebas de usuario (Alpha y Beta) para asegurar su correcto funcionamiento y identificar/corregir cualquier fallo.

## Documentación

El proyecto incluye un manual de usuario completo cubriendo la descripción, mapa, funcionalidades, y preguntas frecuentes del sistema, categorizado por niveles de usuario (Administrador, Gerente, Trabajador).

## Licencia

[Especificar la licencia aquí si aplica]

## Contacto

Para cualquier pregunta o soporte, por favor contactar a los autores.
