<?php

header("Content-Type: application/wsdl+xml; charset=utf-8");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<definitions xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
             xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
             xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
             xmlns:mime="http://schemas.xmlsoap.org/wsdl/mime/"
             xmlns:tns="http://localhost/owox/soap/"
             xmlns:xs="http://www.w3.org/2001/XMLSchema"
             xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/"
             xmlns:http="http://schemas.xmlsoap.org/wsdl/http/"
             name="PaymentWsdl"
             xmlns="http://schemas.xmlsoap.org/wsdl/">
    <types>
        <xs:schema elementFormDefault="qualified"
                   xmlns:xs="http://www.w3.org/2001/XMLSchema"
                   targetNamespace="http://localhost/owox/soap/">
            <xs:complexType name="Purchase">
                <xs:sequence>
                    <xs:element name="name" type="xs:string" minOccurs="1" maxOccurs="1" />
                    <xs:element name="price" type="xs:decimal" minOccurs="1" maxOccurs="1" />
                    <xs:element name="amount" type="xs:int" minOccurs="1" maxOccurs="1" />
                    <xs:element name="currendy" type="xs:string" minOccurs="1" maxOccurs="1" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="purchaseList">
                <xs:sequence>
                    <xs:element name="purchase" type="Purchase" minOccurs="1" maxOccurs="unbounded" />
                </xs:sequence>
            </xs:complexType>
            <xs:element name="Request">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="name" type="xs:string" minOccurs="1" maxOccurs="1" />
                        <xs:element name="lastName" type="xs:string" minOccurs="1" maxOccurs="1" />
                        <xs:element name="email" type="xs:string" minOccurs="1" maxOccurs="1" />
                        <xs:element name="totalPrice" type="xs:decimal" minOccurs="1" maxOccurs="1" />
                        <xs:element name="currency" type="xs:string" minOccurs="1" maxOccurs="1" />
                        <xs:element name="purchaseList" type="purchaseList" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
            <xs:element name="Response">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="status" type="xs:boolean" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>
        </xs:schema>
    </types>

    <!-- Сообщения процедуры -->
    <message name="GetPaymentRequest">
        <part name="Request" element="tns:Request" />
    </message>
    <message name="GetPaymentResponse">
        <part name="Response" element="tns:Response" />
    </message>

    <!-- Привязка процедуры к сообщениям -->
    <portType name="PaymentServicePortType">
        <operation name="GetPayment">
            <input message="tns:GetPaymentRequest" />
            <output message="tns:GetPaymentResponse" />
        </operation>
    </portType>

    <!-- Формат процедур веб-сервиса -->
    <binding name="PaymentServiceBinding" type="tns:PaymentServicePortType">
        <soap:binding transport="http://schemas.xmlsoap.org/soap/http" />
        <operation name="GetPayment">
            <soap:operation soapAction="" />
            <input>
                <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>
    </binding>

    <!-- Определение сервиса -->
    <service name="PaymentService">
        <port name="PaymentServicePort" binding="tns:PaymentServiceBinding">
            <soap:address location="http://localhost/owox/soap/payment.php" />
        </port>
    </service>
</definitions>
